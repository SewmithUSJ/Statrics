package org.example.statrics.service;

import org.example.statrics.entity.Worker;
import org.example.statrics.repository.WorkerRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class WorkerService {

    @Autowired
    private WorkerRepository workerRepository;

    // Save Worker
    public Worker saveWorker(Worker worker) {
        return workerRepository.save(worker);
    }

    // Get All Workers
    public List<Worker> getAllWorkers() {
        return workerRepository.findAll();
    }

    // Get Worker By ID
    public Worker getWorkerById(Long id) {
        return workerRepository.findById(id).orElse(null);
    }

    // Update Worker
    public Worker updateWorker(Long id, Worker workerDetails) {

        Worker worker = workerRepository.findById(id).orElse(null);

        if (worker != null) {

            worker.setName(workerDetails.getName());
            worker.setNIC(workerDetails.getNIC());
            worker.setEmail(workerDetails.getEmail());
            worker.setContact(workerDetails.getContact());
            worker.setPassword(workerDetails.getPassword());
            worker.setExperienceYear(workerDetails.getExperienceYear());
            worker.setLinkedin(workerDetails.getLinkedin());

            return workerRepository.save(worker);
        }

        return null;
    }

    // Delete Worker
    public boolean deleteWorker(Long id) {

        if (workerRepository.existsById(id)) {
            workerRepository.deleteById(id);
            return true;
        }

        return false;
    }

}