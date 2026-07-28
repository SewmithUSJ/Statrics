package org.example.statrics.service;

import org.example.statrics.entity.Message;
import org.example.statrics.repository.MessageRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class MessageService {

    @Autowired
    private MessageRepository repository;

    public Message saveMessage(Message message) {
        return repository.save(message);
    }

    public List<Message> getAllMessages() {
        return repository.findAll();
    }

    public Optional<Message> getMessageById(Long id) {
        return repository.findById(id);
    }

    public Message updateMessage(Long id, Message message) {

        Message existing = repository.findById(id)
                .orElseThrow(() -> new RuntimeException("Message not found"));

        existing.setSenderType(message.getSenderType());
        existing.setContent(message.getContent());
        existing.setTimeStamp(message.getTimeStamp());
        existing.setChatSession(message.getChatSession());

        return repository.save(existing);
    }

    public void deleteMessage(Long id) {
        repository.deleteById(id);
    }
}