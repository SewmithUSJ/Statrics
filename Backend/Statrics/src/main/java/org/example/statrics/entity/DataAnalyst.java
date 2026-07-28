package org.example.statrics.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.Table;

@Entity
@Table(name = "data_analysts")
public class DataAnalyst extends WorkType {

    private String pathwayPlatform;

    public DataAnalyst() {
    }

    public String getPathwayPlatform() {
        return pathwayPlatform;
    }

    public void setPathwayPlatform(String pathwayPlatform) {
        this.pathwayPlatform = pathwayPlatform;
    }
}