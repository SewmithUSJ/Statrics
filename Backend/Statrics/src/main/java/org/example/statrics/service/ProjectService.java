package org.example.statrics.service;

import org.example.statrics.entity.ChatSession;
import org.example.statrics.entity.Project;
import org.example.statrics.entity.ProjectStatus;
import org.example.statrics.entity.Worker;
import org.example.statrics.repository.ChatRepository;
import org.example.statrics.repository.ProjectRepository;
import org.example.statrics.repository.WorkerRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.time.LocalDate;
import java.util.List;

@Service
public class ProjectService {

    @Autowired
    private ProjectRepository projectRepository;

    @Autowired
    private WorkerRepository workerRepository;

    @Autowired
    private ChatRepository chatSessionRepository;

    public Project saveProject(Project project) {
        return projectRepository.save(project);
    }

    public List<Project> getAllProjects() {
        return projectRepository.findAll();
    }

    public List<Project> getProjectByUserId(Long userId) {
        return projectRepository.findByUserUserId(userId);
    }

    public List<Project> getUnassignedProjects() {return projectRepository.findByWorkerIsNull();}

    public Project updateProject(Project project) {
        return projectRepository.save(project);
    }

    public void deleteProject(Long id) {
        projectRepository.deleteById(id);
    }

    public Project assignWorker(Long projectId, Long workerId) {

        Project project = projectRepository.findById(projectId).orElse(null);
        Worker worker = workerRepository.findById(workerId).orElse(null);

        if (project == null || worker == null) {
            return null;
        }

        // Assign worker
        project.setWorker(worker);

        // Update status
        project.setStatus(ProjectStatus.IN_PROGRESS);

        // Create chat session only if one doesn't exist
        if (project.getChatSession() == null) {

            ChatSession chatSession = new ChatSession();
            chatSession.setCreationDate(LocalDate.now());
            chatSession.setProject(project);

            chatSessionRepository.save(chatSession);

            project.setChatSession(chatSession);
        }

        return projectRepository.save(project);
    }
    public List<Project> getProjectsByWorkerId(Long workerId) {
        return projectRepository.findByWorkerWorkerId(workerId);
    }

    public List<Project> getInProgressProjectsByWorker(Long workerId) {

        return projectRepository.findByWorkerWorkerIdAndStatus(
                workerId,
                ProjectStatus.IN_PROGRESS
        );
    }
}