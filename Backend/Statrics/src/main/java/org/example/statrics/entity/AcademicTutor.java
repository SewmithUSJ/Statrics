package org.example.statrics.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.Table;

@Entity
@Table(name = "academic_tutors")
public class AcademicTutor extends WorkType {

    private String currentGPA;

    private String degree;

    private String university;

    public AcademicTutor() {
    }

    public String getCurrentGPA() {
        return currentGPA;
    }

    public void setCurrentGPA(String currentGPA) {
        this.currentGPA = currentGPA;
    }

    public String getDegree() {
        return degree;
    }

    public void setDegree(String degree) {
        this.degree = degree;
    }

    public String getUniversity() {
        return university;
    }

    public void setUniversity(String university) {
        this.university = university;
    }

    public void setWorkType(WorkType workType) {
    }
}