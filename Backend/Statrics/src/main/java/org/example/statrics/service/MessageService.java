package org.example.statrics.service;

import org.example.statrics.entity.ChatSession;
import org.example.statrics.entity.Message;
import org.example.statrics.repository.ChatRepository;

import org.example.statrics.repository.MessageRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.time.LocalDateTime;
import java.util.List;
import java.util.Optional;

@Service
public class MessageService {

    @Autowired
    private MessageRepository repository;

    @Autowired
    private ChatRepository chatRepository;

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


    public Message sendMessage(Long chatId, Message message) {

        ChatSession chatSession =
                chatRepository.findById(chatId).orElse(null);


        if(chatSession == null){
            return null;
        }

        message.setChatSession(chatSession);
        message.setTimeStamp(LocalDateTime.now());

        return repository.save(message);
    }

    public List<Message> getMessages(Long chatId){

        return repository
                .findByChatSessionChatIdOrderByTimeStampAsc(chatId);

    }


    public void deleteMessage(Long id) {
        repository.deleteById(id);
    }

}