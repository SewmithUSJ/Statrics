package org.example.statrics.service;

import org.example.statrics.entity.Appointment;
import org.example.statrics.entity.AppointmentDTO;
import org.example.statrics.entity.AppointmentStatus;
import org.example.statrics.repository.AppointmentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

@Service
public class AppointmentService {

    @Autowired
    private AppointmentRepository repository;

    public Appointment saveAppointment(Appointment appointment) {

        appointment.setStatus(AppointmentStatus.PENDING);

        return repository.save(appointment);
    }

    public List<AppointmentDTO> getWorkerAppointments(Long workerId) {

        List<Appointment> appointments =
                repository.findByProjectWorkerWorkerId(workerId);

        List<AppointmentDTO> dtoList = new ArrayList<>();

        for (Appointment appointment : appointments) {

            AppointmentDTO dto = new AppointmentDTO();

            dto.setAppointmentId(appointment.getAppointmentId());
            dto.setDate(appointment.getDate());
            dto.setTime(appointment.getTime());
            dto.setDescription(appointment.getDescription());
            dto.setDurationMinutes(appointment.getDurationMinutes());
            dto.setStatus(appointment.getStatus());

            dto.setProjectId(appointment.getProject().getProjectId());
            dto.setProjectTitle(appointment.getProject().getProjectTitle());
            dto.setProjectService(appointment.getProject().getService());

            dtoList.add(dto);
        }

        return dtoList;
    }

    public Appointment updateStatus(Long appointmentId, AppointmentStatus status) {

        Appointment appointment = repository.findById(appointmentId).orElse(null);

        if (appointment == null) {
            return null;
        }

        appointment.setStatus(status);

        return repository.save(appointment);
    }

    public List<Appointment> getAllAppointments() {
        return repository.findAll();
    }

    public Optional<Appointment> getAppointmentById(Long id) {
        return repository.findById(id);
    }

    public Appointment updateAppointment(Long id, Appointment appointment) {

        Appointment existing = repository.findById(id)
                .orElseThrow(() -> new RuntimeException("Appointment not found"));

        existing.setDate(appointment.getDate());
        existing.setTime(appointment.getTime());
        existing.setDescription(appointment.getDescription());
        existing.setDurationMinutes(appointment.getDurationMinutes());
        existing.setProject(appointment.getProject());

        return repository.save(existing);
    }

    public void deleteAppointment(Long id) {
        repository.deleteById(id);
    }
}