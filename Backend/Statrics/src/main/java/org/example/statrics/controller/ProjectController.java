package org.example.statrics.controller;

import org.example.statrics.entity.Project;
import org.example.statrics.service.ProjectService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/projects")
@CrossOrigin("*")
public class ProjectController {

    @Autowired
    private ProjectService service;
    @GetMapping("/test")
    public  String sayHello() {
        return "Hello Yasindu!";
    }

    @PostMapping("/create")
    public Project createProject(@RequestBody Project project) {
        return service.saveProject(project);
    }

    @GetMapping
    public List<Project> getAllProjects() {
        return service.getAllProjects();
    }

    @GetMapping("/user/{userId}")
    public List<Project> getProjectsByUser(@PathVariable Long userId) {
        return service.getProjectByUserId(userId);
    }

    @GetMapping("/unassigned/{workerId}")
    public List<Project> getUnassignedProjects(@PathVariable Long workerId) {return service.getUnassignedProjects( workerId);}

    @GetMapping("/worker/{workerId}")
    public List<Project> getProjectsByWorker(@PathVariable Long workerId) {
        return service.getProjectsByWorkerId(workerId);
    }

    @GetMapping("/worker/{workerId}/in-progress")
    public List<Project> getWorkerInProgressProjects(
            @PathVariable Long workerId) {

        return service.getInProgressProjectsByWorker(workerId);
    }

    @PutMapping("/{id}")
    public Project updateProject(@PathVariable Long id,
                                 @RequestBody Project project) {

        project.setProjectId(id);
        return service.updateProject(project);
    }

    @PutMapping("/{projectId}/worker/{workerId}")
    public ResponseEntity<Project> assignWorker(
            @PathVariable Long projectId,
            @PathVariable Long workerId) {

        Project project = service.assignWorker(projectId, workerId);

        if (project == null) {
            return ResponseEntity.notFound().build();
        }

        return ResponseEntity.ok(project);
    }

    @DeleteMapping("/{id}")
    public String deleteProject(@PathVariable Long id) {
        service.deleteProject(id);
        return "Project deleted successfully.";
    }
}