package org.example.statrics.controller;

import org.example.statrics.entity.Appointment;
import org.example.statrics.service.AppointmentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/appointments")
@CrossOrigin(origins = "*")
public class AppointmentController {

    @Autowired
    private AppointmentService appointmentService;

    // Create Appointment
    @PostMapping
    public ResponseEntity<Appointment> createAppointment(
            @RequestBody Appointment appointment) {

        Appointment savedAppointment = appointmentService.create(appointment);

        return ResponseEntity.ok(savedAppointment);
    }

    // Get All Appointments
    @GetMapping
    public List<Appointment> getAllAppointments() {
        return appointmentService.getAllAppointments();
    }

    // Get Appointment By ID
    @GetMapping("/{id}")
    public Optional<Appointment> getAppointmentById(@PathVariable Long id) {
        return appointmentService.getAppointmentById(id);
    }

    // Update Appointment
    @PutMapping("/{id}")
    public Appointment updateAppointment(@PathVariable Long id,
                                         @RequestBody Appointment appointment) {
        return appointmentService.updateAppointment(id, appointment);
    }

    // Delete Appointment
    @DeleteMapping("/{id}")
    public String deleteAppointment(@PathVariable Long id) {
        appointmentService.deleteAppointment(id);
        return "Appointment deleted successfully.";
    }
}