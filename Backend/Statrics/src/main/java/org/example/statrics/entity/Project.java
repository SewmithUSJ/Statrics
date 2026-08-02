package org.example.statrics.entity;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;
import java.util.List;

@Entity
@Table(name = "projects")
public class Project {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long projectId;

    @Column(nullable = false)
    private String projectTitle;

    @Enumerated(EnumType.STRING)
    private ServiceType service;

    @Column(columnDefinition = "TEXT")
    private String about;

    @Column(columnDefinition = "TEXT")
    private String extraDetails;

    private String targetDeadline;

    @Enumerated(EnumType.STRING)
    private BudgetRange budgetRange;

    private double finalBudget;

    @ManyToOne
    private User user;

    @ManyToOne

    @JoinColumn(name = "worker_id")
    @JsonIgnore

    private Worker worker;

    @OneToOne(mappedBy = "project", cascade = CascadeType.ALL)
    private Payment payment;

    @OneToOne(mappedBy = "project", cascade = CascadeType.ALL)
    private ChatSession chatSession;

    @OneToMany(mappedBy = "project", cascade = CascadeType.ALL)
    private List<Appointment> appointments;

    @Enumerated(EnumType.STRING)
    private ProjectStatus status;


    public Project() {
    }
    public Long getProjectId() {
        return projectId;
    }

    public void setProjectId(Long projectId) {
        this.projectId = projectId;
    }

    public String getProjectTitle() {
        return projectTitle;
    }

    public void setProjectTitle(String projectTitle) {
        this.projectTitle = projectTitle;
    }

    public ServiceType getService() {
        return service;
    }

    public void setService(ServiceType service) {
        this.service = service;
    }

    public String getAbout() {
        return about;
    }

    public void setAbout(String about) {
        this.about = about;
    }

    public String getExtraDetails() {
        return extraDetails;
    }

    public void setExtraDetails(String extraDetails) {
        this.extraDetails = extraDetails;
    }

    public String getTargetDeadline() {
        return targetDeadline;
    }

    public void setTargetDeadline(String targetDeadline) {
        this.targetDeadline = targetDeadline;
    }

    public BudgetRange getBudgetRange() {
        return budgetRange;
    }

    public void setBudgetRange(BudgetRange budgetRange) {
        this.budgetRange = budgetRange;
    }

    public double getFinalBudget() {
        return finalBudget;
    }

    public void setFinalBudget(double finalBudget) {
        this.finalBudget = finalBudget;
    }

    public User getUser() {return user;}

    public void setUser(User user) {this.user = user;}

    public ProjectStatus getStatus() {return status;}

    public void setStatus(ProjectStatus status) {this.status = status;}

    public Worker getWorker() {return worker;}

    public void setWorker(Worker worker) {this.worker = worker;}

    public Payment getPayment() {return payment;}

    public void setPayment(Payment payment) {this.payment = payment;}

    public ChatSession getChatSession() {return chatSession;}

    public void setChatSession(ChatSession chatSession) {this.chatSession = chatSession;}

    public List<Appointment> getAppointments() {return appointments;}

    public void setAppointments(List<Appointment> appointments) {this.appointments = appointments; }
}
