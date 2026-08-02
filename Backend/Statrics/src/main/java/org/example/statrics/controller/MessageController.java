package org.example.statrics.controller;

import org.example.statrics.entity.Message;
import org.example.statrics.service.MessageService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/messages")
@CrossOrigin(origins = "*")
public class MessageController {

    @Autowired
    private MessageService messageService;

    // Create Message
    @PostMapping
    public Message saveMessage(@RequestBody Message message) {
        return messageService.saveMessage(message);
    }

    @PostMapping("/{chatId}")
    public Message sendMessage(
            @PathVariable Long chatId,
            @RequestBody Message message){

        return messageService.sendMessage(chatId,message);

    }

    @GetMapping("/chat/{chatId}")
    public List<Message> getMessages(
            @PathVariable Long chatId){

        return messageService.getMessages(chatId);

    }

    // Get All Messages
    @GetMapping
    public List<Message> getAllMessages() {
        return messageService.getAllMessages();
    }

    // Get Message By ID
    @GetMapping("/{id}")
    public Optional<Message> getMessageById(@PathVariable Long id) {
        return messageService.getMessageById(id);
    }

    // Update Message
    @PutMapping("/{id}")
    public Message updateMessage(@PathVariable Long id,
                                 @RequestBody Message message) {
        return messageService.updateMessage(id, message);
    }

    // Delete Message
    @DeleteMapping("/{id}")
    public String deleteMessage(@PathVariable Long id) {
        messageService.deleteMessage(id);
        return "Message deleted successfully.";
    }
}