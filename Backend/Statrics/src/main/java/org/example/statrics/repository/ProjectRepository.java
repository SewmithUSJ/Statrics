package org.example.statrics.repository;

import org.example.statrics.entity.Project;
import org.example.statrics.entity.ProjectStatus;
import org.example.statrics.entity.ServiceType;
import org.springframework.data.jpa.repository.JpaRepository;
import java.util.List;

public interface ProjectRepository extends JpaRepository<Project, Long> {
    List<Project> findByUserUserId(Long userId);


    List<Project> findByWorkerWorkerId(Long workerId);

    List<Project> findByWorkerWorkerIdAndStatus(
            Long workerId,
            ProjectStatus status
    );

    List<Project> findByWorkerIsNullAndServiceIn(List<ServiceType> services);
}
