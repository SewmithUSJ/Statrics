package org.example.statrics.service;

import org.example.statrics.entity.Appointment;
import org.example.statrics.repository.AppointmentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class AppointmentService {

    @Autowired
    private AppointmentRepository repository;

    public Appointment saveAppointment(Appointment appointment) {
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