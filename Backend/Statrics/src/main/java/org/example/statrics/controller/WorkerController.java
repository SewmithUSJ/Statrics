package org.example.statrics.controller;

import org.example.statrics.entity.Worker;
import org.example.statrics.service.WorkerService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/workers")
@CrossOrigin(origins = "*")
public class WorkerController {

    @Autowired
    private WorkerService workerService;

    // Create Worker
    @PostMapping
    public Worker createWorker(@RequestBody Worker worker) {
        return workerService.saveWorker(worker);
    }
    @PostMapping("/login")
    public Worker login(@RequestBody Worker worker) {

        Worker loggedWorker = workerService.login(
                worker.getEmail(),
                worker.getPassword()
        );

        if (loggedWorker == null) {
            return null;
        }

        return loggedWorker;
    }
    // Get All Workers
    @GetMapping
    public List<Worker> getAllWorkers() {
        return workerService.getAllWorkers();
    }

    // Get Worker By ID
    @GetMapping("/{id}")
    public ResponseEntity<Worker> getWorkerById(@PathVariable Long id) {

        Worker worker = workerService.getWorkerById(id);

        if (worker == null) {
            return ResponseEntity.notFound().build();
        }

        return ResponseEntity.ok(worker);
    }

    // Update Worker
    @PutMapping("/{id}")
    public ResponseEntity<Worker> updateWorker(
            @PathVariable Long id,
            @RequestBody Worker workerDetails) {

        Worker updatedWorker = workerService.updateWorker(id, workerDetails);

        if (updatedWorker == null) {
            return ResponseEntity.notFound().build();
        }

        return ResponseEntity.ok(updatedWorker);
    }

    // Delete Worker
    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteWorker(@PathVariable Long id) {

        boolean deleted = workerService.deleteWorker(id);

        if (!deleted) {
            return ResponseEntity.notFound().build();
        }

        return ResponseEntity.ok("Worker deleted successfully.");
    }

}