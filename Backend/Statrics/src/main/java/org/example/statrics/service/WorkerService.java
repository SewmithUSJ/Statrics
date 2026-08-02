package org.example.statrics.service;

import org.example.statrics.entity.*;
import org.example.statrics.repository.WorkerRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class WorkerService {

    @Autowired
    private WorkerRepository workerRepository;

    // Save Worker
    public Worker saveWorker(Worker worker) {

        if (worker.getWorkTypes() != null) {
            for (WorkType workType : worker.getWorkTypes()) {
                workType.setWorker(worker);
            }
        }

        return workerRepository.save(worker);
    }
    // Get All Workers

//    public Worker saveWorker(Worker worker) {
//        return workerRepository.save(worker);
//    }

    public Worker login(String email, String password) {

//        return workerRepository
//                .findByEmailAndPassword(email, password)
//                .orElse(null);
        Optional<Worker> worker = workerRepository.findByEmail(email);

        if (worker.isPresent() &&
                worker.get().getPassword().equals(password)) {
            return worker.get();
        }
        return null;
    }
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