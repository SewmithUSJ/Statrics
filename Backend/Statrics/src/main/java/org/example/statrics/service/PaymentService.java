package org.example.statrics.service;

import org.example.statrics.entity.Payment;
import org.example.statrics.repository.PaymentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PaymentService {

    @Autowired
    private PaymentRepository paymentRepository;

    // Save Payment
    public Payment savePayment(Payment payment) {
        return paymentRepository.save(payment);
    }

    // Get All Payments
    public List<Payment> getAllPayments() {
        return paymentRepository.findAll();
    }

    // Get Payment By ID
    public Payment getPaymentById(Long id) {
        return paymentRepository.findById(id).orElse(null);
    }

    // Update Payment
    public Payment updatePayment(Long id, Payment paymentDetails) {

        Payment payment = paymentRepository.findById(id).orElse(null);

        if (payment != null) {

            payment.setBaseAmount(paymentDetails.getBaseAmount());
            payment.setTransactionDate(paymentDetails.getTransactionDate());
            payment.setSettled(paymentDetails.isSettled());
            payment.setProject(paymentDetails.getProject());

            return paymentRepository.save(payment);
        }

        return null;
    }

    // Delete Payment
    public boolean deletePayment(Long id) {

        if (paymentRepository.existsById(id)) {
            paymentRepository.deleteById(id);
            return true;
        }

        return false;
    }

}