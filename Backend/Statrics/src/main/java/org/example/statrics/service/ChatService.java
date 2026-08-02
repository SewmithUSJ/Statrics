package org.example.statrics.service;

import org.example.statrics.entity.ChatSession;
import org.example.statrics.repository.ChatRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class ChatService {

    @Autowired
    private ChatRepository repository;

    public ChatSession saveChatSession(ChatSession chatSession) {
        return repository.save(chatSession);
    }

    public List<ChatSession> getAllChatSessions() {
        return repository.findAll();
    }

    public Optional<ChatSession> getChatSessionById(Long id) {
        return repository.findById(id);
    }

    public ChatSession updateChatSession(Long id, ChatSession chatSession) {
        ChatSession existing = repository.findById(id)
                .orElseThrow(() -> new RuntimeException("Chat Session not found"));

        existing.setCreationDate(chatSession.getCreationDate());
        existing.setProject(chatSession.getProject());
        existing.setMessages(chatSession.getMessages());

        return repository.save(existing);
    }

    public void deleteChatSession(Long id) {
        repository.deleteById(id);
    }
}