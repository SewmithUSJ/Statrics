package org.example.statrics.controller;

import org.example.statrics.entity.ChatSession;
import org.example.statrics.service.ChatService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/chatSessions")
@CrossOrigin(origins = "*")
public class ChatController {

    @Autowired
    private ChatService chatSessionService;

    // Create Chat Session
    @PostMapping
    public ChatSession createChatSession(@RequestBody ChatSession chatSession) {
        return chatSessionService.saveChatSession(chatSession);
    }

    // Get All Chat Sessions
    @GetMapping
    public List<ChatSession> getAllChatSessions() {
        return chatSessionService.getAllChatSessions();
    }

    // Get Chat Session By ID
    @GetMapping("/{id}")
    public Optional<ChatSession> getChatSessionById(@PathVariable Long id) {
        return chatSessionService.getChatSessionById(id);
    }

    // Update Chat Session
    @PutMapping("/{id}")
    public ChatSession updateChatSession(@PathVariable Long id,
                                         @RequestBody ChatSession chatSession) {
        return chatSessionService.updateChatSession(id, chatSession);
    }

    // Delete Chat Session
    @DeleteMapping("/{id}")
    public String deleteChatSession(@PathVariable Long id) {
        chatSessionService.deleteChatSession(id);
        return "Chat Session deleted successfully.";
    }
}