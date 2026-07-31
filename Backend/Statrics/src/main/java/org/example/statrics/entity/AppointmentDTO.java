package org.example.statrics.entity;

public class AppointmentDTO {

    private Long appointmentId;
    private String date;
    private String time;
    private String description;
    private int durationMinutes;
    private AppointmentStatus status;


    private Long projectId;
    private String projectTitle;
    private ServiceType projectService;

    public AppointmentDTO() {}

    public AppointmentDTO(Appointment appointment) {}

    public Long getAppointmentId() {
        return appointmentId;
    }

    public void setAppointmentId(Long appointmentId) {
        this.appointmentId = appointmentId;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public int getDurationMinutes() {
        return durationMinutes;
    }

    public void setDurationMinutes(int durationMinutes) {
        this.durationMinutes = durationMinutes;
    }

    public AppointmentStatus getStatus() {
        return status;
    }

    public void setStatus(AppointmentStatus status) {
        this.status = status;
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

    public ServiceType getProjectService() {
        return projectService;
    }

    public void setProjectService(ServiceType projectService) {
        this.projectService = projectService;
    }
}
