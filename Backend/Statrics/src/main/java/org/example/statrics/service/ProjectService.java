package org.example.statrics.service;

import org.example.statrics.entity.*;
import org.example.statrics.repository.AppointmentRepository;
import org.example.statrics.repository.ProjectRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProjectService {

    @Autowired
    private ProjectRepository projectRepository;

    @Autowired
    private AppointmentRepository appointmentRepository;

    public Project saveProject(Project project) {
        return projectRepository.save(project);
    }

    public List<Project> getUserInProgressProjects(Long userId) {
        return projectRepository.findByUserUserIdAndStatus(
                userId,
                ProjectStatus.IN_PROGRESS
        );
    }

    public List<AppointmentDTO> getProjectsAndAppointments(Long userId) {

        List<Project> projects = projectRepository.findByUserUserId(userId);

        List<AppointmentDTO> appointmentDTOS = new ArrayList<>();

        for (Project project : projects) {



            List<Appointment> appointments =
                    appointmentRepository.findByProjectProjectId(project.getProjectId());
            

            for (Appointment appointment : appointments) {

                AppointmentDTO adto = new AppointmentDTO();

                adto.setProjectId(project.getProjectId());
                adto.setProjectTitle(project.getProjectTitle());
                adto.setService(project.getService().toString());
                adto.setStatus(project.getStatus().toString());
                adto.setAppointmentId(appointment.getAppointmentId());
                adto.setDate(appointment.getDate());
                adto.setTime(appointment.getTime());
                adto.setDescription(appointment.getDescription());
                adto.setDurationMinutes(appointment.getDurationMinutes());
                adto.setAppointmentStatus(appointment.getStatus().toString());

                appointmentDTOS.add(adto);
            }

        }

        return appointmentDTOS;
    }

    public List<Project> getAllProjects() {
        return projectRepository.findAll();
    }

    public List<Project> getProjectByUserId(Long userId) {
        return projectRepository.findByUserUserId(userId);
    }

    public Project updateProject(Project project) {
        return projectRepository.save(project);
    }

    public void deleteProject(Long id) {
        projectRepository.deleteById(id);
    }
}