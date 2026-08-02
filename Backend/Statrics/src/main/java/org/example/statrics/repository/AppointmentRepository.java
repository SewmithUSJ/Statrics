package org.example.statrics.repository;

import org.example.statrics.entity.Appointment;

import org.example.statrics.entity.AppointmentStatus;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface AppointmentRepository extends JpaRepository<Appointment, Long> {


    List<Appointment> findByProjectProjectId(Long projectId);

    List<Appointment> findByProjectWorkerWorkerId(Long workerId);

    List<Appointment> findByProjectWorkerWorkerIdAndStatus(
            Long workerId,
            AppointmentStatus status
    );

}