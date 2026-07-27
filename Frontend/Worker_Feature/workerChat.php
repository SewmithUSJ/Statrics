<?php include 'workerNav&sideBar.php'; ?>



<div class="section-container" style="padding-bottom: 50px;margin-left: 17%;width: 100%; margin-top: 5%; background-color: #0f172a;">
    
    <div class="section-header">
        <p class="subtitle" style="color: var(--accent-blue);">Secure Communication Node</p>
        <h2>LIVE CHAT</h2>
        <p style="color: var(--text-muted); max-width: 750px; font-size: 14px; margin-top: -20px;">
            Coordinate directly with your allocated specialist. Select your project and start the conversation.
        </p>
    </div>

    <!-- Core Chat Split Frame Grid -->
    <div style="display: grid; grid-template-columns: 0.75fr 1.25fr; gap: 30px; margin-top: 40px; height: 600px; align-items: stretch;">
        
        <!-- Left Sidebar: Instant System Vectors Panel -->
        <div style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; border-radius: 16px; padding: 25px; display: flex; flex-direction: column;">
            <h4 style="color: white; font-size: 14px; margin: 0 0 15px 0; text-transform: uppercase; letter-spacing: 0.5px; color: var(--accent-blue);">
                <i class="fa-solid fa-circle-nodes"></i> YOUR PROJECTS
            </h4>
            <p style="color: var(--text-muted); font-size: 11px; margin-top: -10px; margin-bottom: 20px;">Select a project to start chatting.</p>
            
            <!-- Stream Selection Stack -->
            <div style="display: flex; flex-direction: column; gap: 12px; overflow-y: auto; flex-grow: 1;">
                
                <!-- Project Stream 1 -->
                <div class="chat-vector-card" onclick="activateChatChannel('presentrics', 'Presentrics Smart Attendance System', 'Akeesha Piyadasa', 'Active Execution')" style="cursor: pointer; background: var(--bg-dark); border: 1px solid #1e293b; padding: 15px; border-radius: 10px; transition: all 0.2s;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 6px;">
                        <strong style="color: white; font-size: 13px; display: block;">Presentrics Hub</strong>
                        <span style="font-size: 9px; padding: 2px 6px; background: rgba(16, 185, 129, 0.08); color: #10b981; border-radius: 4px; font-weight: 600;">Active</span>
                    </div>
                    <span style="font-size: 11px; color: var(--text-muted); display: block;"><i class="fa-solid fa-user-tie"></i> Worker: Akeesha Piyadasa</span>
                </div>

                <!-- Project Stream 2 -->
                <div class="chat-vector-card" onclick="activateChatChannel('aquarelief', 'AquaRelief Flood Management Module', 'Nellisha Weerasekera', 'Review Backlog')" style="cursor: pointer; background: var(--bg-dark); border: 1px solid #1e293b; padding: 15px; border-radius: 10px; transition: all 0.2s;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 6px;">
                        <strong style="color: white; font-size: 13px; display: block;">AquaRelief System</strong>
                        <span style="font-size: 9px; padding: 2px 6px; background: rgba(245, 158, 11, 0.08); color: #f59e0b; border-radius: 4px; font-weight: 600;">Pending</span>
                    </div>
                    <span style="font-size: 11px; color: var(--text-muted); display: block;"><i class="fa-solid fa-user-tie"></i> Worker: Nellisha Weerasekera</span>
                </div>

            </div>
        </div>

        <!-- Right Workstation Panel: Human Communication Terminal -->
        <div style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; border-radius: 16px; display: flex; flex-direction: column; overflow: hidden; position: relative;">
            
            <!-- Context Header Bar -->
            <div id="chatActiveHeader" style="background: rgba(30, 41, 59, 0.4); padding: 20px 25px; border-bottom: 1px solid #1e293b; display: none; justify-content: space-between; align-items: center;">
                <div>
                    <h3 id="txtActiveProjectTitle" style="color: white; font-size: 15px; margin: 0 0 4px 0;"></h3>
                    <p style="margin: 0; font-size: 12px; color: var(--text-muted);">
                        Connected Channel with: <strong id="txtActiveWorker" style="color: #e2e8f0;"></strong>
                    </p>
                </div>
                <span id="txtActiveStatus" class="status-tag"></span>
            </div>

            <!-- Scrollable Message Stream Window -->
            <div id="chatMessageStream" style="flex-grow: 1; padding: 25px; overflow-y: auto; display: flex; flex-direction: column; gap: 15px;">
                <!-- Fallback locked message view if empty -->
                <div id="chatLockedFallback" style="margin: auto; text-align: center; max-width: 320px;">
                    <div style="font-size: 32px; color: #334155; margin-bottom: 15px;"><i class="fa-solid fa-comments-dashed"></i></div>
                    <h4 style="color: white; font-size: 14px; margin: 0 0 8px 0;">LIVE CHAT ...</h4>
                    <p style="color: var(--text-muted); font-size: 12px; margin: 0; line-height: 1.5;">You must select a project on the left to confirm project context and open transmission.</p>
                </div>
            </div>

            <!-- Transmission Input Dock -->
            <div id="chatInputBarDeck" style="padding: 20px 25px; background: rgba(15, 23, 42, 0.6); border-top: 1px solid #1e293b; opacity: 0.3; pointer-events: none;">
                <form id="chatTransmissionForm" onsubmit="transmitHumanPayload(event)" style="display: flex; gap: 15px; align-items: center;">
                    <input type="text" id="inputChatMessage" autocomplete="off" placeholder="Select an active project vector to type your message..." style="flex-grow: 1; padding: 12px 16px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px; font-size: 13px;">
                    <button type="submit" class="cta-btn" style="padding: 11px 20px; white-space: nowrap; font-size: 13px; font-weight: 600;">
                        <i class="fa-solid fa-paper-plane-top"></i> Send
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<script>
let currentActiveProjectKey = null;

function activateChatChannel(projectKey, projectTitle, assignedWorker, statusLabel) {
    currentActiveProjectKey = projectKey;
    
    // De-activate older chip visual highlights and assign to selection
    document.querySelectorAll('.chat-vector-card').forEach(card => card.style.borderColor = '#1e293b');
    event.currentTarget.style.borderColor = 'var(--accent-blue)';

    // Remove the standby graphic placeholder elements
    document.getElementById('chatLockedFallback').style.display = 'none';
    
    // Update structural text layers dynamically
    document.getElementById('txtActiveProjectTitle').innerText = projectTitle;
    document.getElementById('txtActiveWorker').innerText = assignedWorker + " (System Support)";
    
    const statusBadge = document.getElementById('txtActiveStatus');
    statusBadge.innerText = statusLabel;
    statusBadge.className = "status-tag " + (statusLabel === 'Active Execution' ? 'tag-active' : 'tag-pending');

    // Unhide main display context blocks and enable terminal elements
    document.getElementById('chatActiveHeader').style.display = 'flex';
    
    const inputDeck = document.getElementById('chatInputBarDeck');
    inputDeck.style.opacity = '1';
    inputDeck.style.pointerEvents = 'auto';
    
    const msgInput = document.getElementById('inputChatMessage');
    msgInput.placeholder = "Type clear requests to " + assignedWorker + "...";
    msgInput.focus();

    // Populate clear human simulation handshake records inside terminal
    const streamContainer = document.getElementById('chatMessageStream');
    streamContainer.innerHTML = `
        <div style="align-self: flex-start; max-width: 75%; background: #1e293b; padding: 12px 16px; border-radius: 12px 12px 12px 0; border: 1px solid #334155;">
            <p style="margin: 0; font-size: 12.5px; color: #f8fafc; line-height: 1.5;">
                Greetings! This channel traces directly to your assigned workspace specialist, <strong>${assignedWorker}</strong>. Please input your structural database specifications or updates here.
            </p>
            <span style="font-size: 9px; color: var(--text-muted); display: block; margin-top: 5px; text-align: right;">System Node Handshake</span>
        </div>
    `;
}

function transmitHumanPayload(event) {
    event.preventDefault();
    const msgInput = document.getElementById('inputChatMessage');
    const messageText = msgInput.value.trim();
    if (!messageText) return;

    const streamContainer = document.getElementById('chatMessageStream');
    
    // Append client outbound message log block inline
    const userMsgNode = document.createElement('div');
    userMsgNode.style.alignSelf = 'flex-end';
    userMsgNode.style.maxWidth = '75%';
    userMsgNode.style.background = 'var(--accent-blue)';
    userMsgNode.style.padding = '12px 16px';
    userMsgNode.style.borderRadius = '12px 12px 0 12px';
    userMsgNode.innerHTML = `
        <p style="margin: 0; font-size: 12.5px; color: white; line-height: 1.5;">${messageText}</p>
        <span style="font-size: 9px; color: rgba(255,255,255,0.7); display: block; margin-top: 5px; text-align: right;">Sent (Human Operator)</span>
    `;
    
    streamContainer.appendChild(userMsgNode);
    msgInput.value = '';
    
    // Auto-scroll screen down evenly
    streamContainer.scrollTop = streamContainer.scrollHeight;
}
</script>

<?php include '../commen/footer.php'; ?>