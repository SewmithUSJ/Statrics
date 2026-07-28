package org.example.statrics.controller;

import org.example.statrics.entity.Project;
import org.example.statrics.service.ProjectService;
import org.springframework.beans.factory.annotation.Autowired;
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

    @PutMapping("/{id}")
    public Project updateProject(@PathVariable Long id,
                                 @RequestBody Project project) {

        project.setProjectId(id);
        return service.updateProject(project);
    }

    @DeleteMapping("/{id}")
    public String deleteProject(@PathVariable Long id) {
        service.deleteProject(id);
        return "Project deleted successfully.";
    }
}