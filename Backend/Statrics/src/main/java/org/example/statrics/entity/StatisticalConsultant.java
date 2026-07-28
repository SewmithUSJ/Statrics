package org.example.statrics.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.Table;

@Entity
@Table(name = "statistical_consultants")
public class StatisticalConsultant extends WorkType {

    private String specializationArea;

    public StatisticalConsultant() {
    }

    public String getSpecializationArea() {
        return specializationArea;
    }

    public void setSpecializationArea(String specializationArea) {
        this.specializationArea = specializationArea;
    }
}