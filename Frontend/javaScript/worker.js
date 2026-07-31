const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const worker_id=urlParams.get('id');

function navbarShift(name) {
    if (name === 'myprojects') {
        window.location.href ="http://localhost:3000/Frontend/Worker_Feature/workerMyProjects.php?id="+worker_id;
    }  else if(name === 'chat'){
        window.location.href ="http://localhost:3000/Frontend/Worker_Feature/workerChat.php?id="+worker_id;
    }else if(name === 'payment'){
        window.location.href ="http://localhost:3000/Frontend/Worker_Feature/workerPayment.php?id="+worker_id;
    }else{
        window.location.href ="http://localhost:3000/Frontend/Worker_Feature/workerProfile.php?id="+worker_id;
    }
}
unassignedProjects();
function unassignedProjects() {
        fetch("http://localhost:8080/projects/unassigned")
    .then(response => response.json())
    .then(projects => {
        let cards = "";
        console.log(projects);
        
        projects.forEach(project =>{
            cards += `
                <div class="wmp-card-container" >
                    <div class="wmp-project-card" id="wmp-req-card-1" data-role="Data Analysis">
                        <div class="wmp-card-header">
                            <div>
                                <h4>${project.projectTitle}</h4>
                                <span class="wmp-role-tag">${project.service}</span>
                            </div>
                            <span class="wmp-status wmp-status-pending">Staged Approval</span>
                        </div>
                        <div class="wmp-card-description" style="margin-top: 12px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                            ${project.about}
                        </div>
                        <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 15px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                            <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                                <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i> Deadline: <span>${project.targetDeadline}</span>
                            </div>
                            <div style="font-size: 12px; color: #34d399; font-weight: 600;">
                                <i class="fa-solid fa-money-bill-wave" style="margin-right: 4px;"></i> Budget: <span>${project.budgetRange}</span>
                            </div>
                        </div>
                        
                        <div class="wmp-action-row">
                            <!-- Inspection Trigger Button -->
                            <button type="button" class="wmp-btn wmp-btn-primary" onclick="wmpOpenInspectionModal('${project.projectTitle}','${project.about}','${project.budgetRange}','${project.targetDeadline}','${project.extraDetails}')">
                                Project Details
                            </button>
                            
                            <!-- Decision Interface Elements -->
                            <div class="wmp-btn-cluster">
                                <button type="button" class="wmp-btn wmp-btn-success" onclick="wmpHandleAllocationDecision('${project.projectId}','${worker_id}')">Accept</button>
                        </div>
                    </div>
                </div>
                `
        })
        document.getElementById('wmpAllocatedContainer').innerHTML=cards;
    })
    }
    // Scoped Inspection Modal Trigger Mechanics
    // Open Inspection Modal with dynamic arguments
    function wmpOpenInspectionModal(title, description, budget,deadline,extraDetails) {
        document.getElementById('wmpModalTitle').innerText = title;
        document.getElementById('wmpModalDesc').innerText = description;
        document.getElementById('wmpModalEx').innerText = extraDetails;
        document.getElementById('wmpModalDeadline').innerText = deadline;
        document.getElementById('wmpModalBudget').innerText = budget;

        document.getElementById('wmpInspectionModal').classList.add('wmp-modal-open');
    }

    function wmpCloseInspectionModal() {
        document.getElementById('wmpInspectionModal').classList.remove('wmp-modal-open');
    }

    function wmpOpenExternalLink(elementId) {
        const linkVal = document.getElementById(elementId).value;
        if(linkVal) {
            window.open(linkVal, '_blank');
        }
    }

    // Interactive Daily Update Commitment Form Action
    function wmpCommitDailyLog(event, logIndex) {
        event.preventDefault();
        const inputField = document.getElementById(`wmp-input-log-${logIndex}`);
        const textReadout = document.getElementById(`wmp-log-val-${logIndex}`);
        
        if (inputField && textReadout) {
            textReadout.innerText = inputField.value;
            alert(`Progress Authenticated: Today's modifications successfully pushed to the activity log stream.`);
            inputField.value = '';
        }
    }

    // Interactive Final Delivery Package Submission Pipeline
    function wmpDeployFinalPackage(event, projectName) {
        event.preventDefault();
        const inputField = event.target.querySelector('input[type="text"]');
        if(inputField) {
            alert(`Deployment Confirmed:\nProject "${projectName}" final builds successfully compiled and routed via: ${inputField.value}`);
            inputField.value = '';
        }
    }

    // Inbound Allocation Order Validation Workflow
    async function wmpHandleAllocationDecision(projectID, workerID) {

    try {
        const response = await fetch(
            `http://localhost:8080/projects/${projectID}/worker/${workerID}`,
            {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                }
            }
        );

        if (response.ok) {
            const project = await response.json();
            alert("Worker assigned successfully!");
            console.log(project);
        } else {
            alert("Failed");
        }

    } catch (error) {
        console.error(error);
    }
}
       


    // Service Assignment Sorting Architecture 
    function wmpFilterByRole() {
        const filterSelection = document.getElementById('wmpRoleSelect').value;
        const cards = document.querySelectorAll('.wmp-project-card');
        
        cards.forEach(card => {
            const cardRole = card.getAttribute('data-role');
            if (filterSelection === 'ALL' || cardRole === filterSelection) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
        wmpUpdateCountIndicators();
    }

    // Runtime Panel Counters Updating Architecture
    function wmpUpdateCountIndicators() {
        const activeItems = document.querySelectorAll('#wmpOngoingContainer .wmp-project-card').length;
        const allocatedItems = document.querySelectorAll('#wmpAllocatedContainer .wmp-project-card').length;
        
        document.getElementById('wmp-count-active').innerText = `${activeItems} Active`;
        document.getElementById('wmp-count-allocated').innerText = `${allocatedItems} Awaiting Action`;
    }
loadWorkerProjects();
    async function loadWorkerProjects() {

    try {

        const response = await fetch(`http://localhost:8080/projects/worker/${worker_id}/in-progress`);

        if (!response.ok) {
            throw new Error("Failed to load projects");
        }

        const projects = await response.json();
        let cards ="";
        console.log(projects);

        projects.forEach(project =>{
            cards +=`
            <div class="wmp-project-card" data-role="Data Analysis">
                    <div class="wmp-card-header">
                        <div>
                            <h4>${project.projectTitle}</h4>
                            <span class="wmp-role-tag">${project.service}</span>
                        </div>
                        <span class="wmp-status wmp-status-running">Processing</span>
                    </div>

                    <!-- About / Description Section -->
                    <div class="wmp-card-description" style="margin-top: 12px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                        ${project.about}
                    </div>

                    <!-- Meta Details: Deadline -->
                    <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 15px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px;">
                        <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                            <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i> Target Deadline: <span>${project.targetDeadline}</span>
                        </div>
                    </div>

                    <!-- Action Area: Live Chat Button -->
                    <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end;">
                        <button type="button" class="wmp-btn wmp-btn-primary" onclick="navbarShift('chat')">
                            <i class="fa-solid fa-comments" style="margin-right: 6px;"></i> Live Chat
                        </button>
                    </div>
                </div>`
        })


        document.getElementById('wmpOngoingContainer').innerHTML=cards;

    } catch (error) {
        console.error(error);
    }
}

async function loadInProgressProjects() {
    let projectCards = "";

    try {

        const response = await fetch(
            `http://localhost:8080/projects/worker/${worker_id}/in-progress`
        );

        const projects = await response.json();

        console.log(projects);

        let chatId = "";
        
        projects.forEach(project=>{
            
            
            projectCards +=`
                <div class="chat-vector-card" onclick="loadMessages('${project.chatSession ? project.chatSession.chatId : ''}','${project.projectTitle}')" style="cursor: pointer; background: var(--bg-dark); border: 1px solid #1e293b; padding: 15px; border-radius: 10px; transition: all 0.2s;">                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 6px;">
                        <strong style="color: white; font-size: 13px; display: block;">${project.projectTitle}</strong>
                        <span style="font-size: 9px; padding: 2px 6px; background: rgba(16, 185, 129, 0.08); color: #10b981; border-radius: 4px; font-weight: 600;">Active</span>
                    </div>
                    <span style="font-size: 11px; color: var(--text-muted); display: block;"> Service : ${project.service} </span>
                </div>
            
            `
        })
        document.getElementById('inProgressProjects').innerHTML=projectCards;

    } catch(error) {
        console.log(error);
    }
    
}
let chatid=0;
async function loadMessages(chatId,title){
    activateChatChannel(title,title,"tag-active");
    chatid=chatId
    const response = await fetch(
        `http://localhost:8080/messages/chat/${chatId}`
    );

    const messages = await response.json();

    let html = "";

    messages.forEach(msg=>{

        if (msg.senderType === 'WORKER') {
            html +=`
            <div style="align-self: flex-end; max-width:75%; background:var(--accent-blue); padding:12px 16px; border-radius: 12px 12px 0 12px; border: 1px solid #334155;">
                <p style="margin: 0; font-size: 12.5px; color: white; line-height: 1.5;"> ${msg.content}</p>
            </div>`
        } else {
            html +=`
                <div style="align-self: flex-start; max-width: 75%; background: #1e293b; padding: 12px 16px; border-radius: 12px 12px 12px 0; border: 1px solid #334155;">
                    <p style="margin: 0; font-size: 12.5px; color: #f8fafc; line-height: 1.5;">${msg.content}</p>
                </div>
            `
        }

    });

    document.getElementById("chatMessageStream").innerHTML = html;

}

async function sendWorkerMessage() {


    const message = {
        senderType: "WORKER",
        content: document.getElementById("inputChatMessage").value
    };

    const response = await fetch(
        `http://localhost:8080/messages/${chatid}`,
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(message)
        }
    );

    const data = await response.json();

    console.log(data);

}

loadAppointments();
async function loadAppointments() {

    try {

        const response = await fetch(
            `http://localhost:8080/appointments/worker/${worker_id}`
        );

        const appointments = await response.json();

        let html = "";
        let html2 ="";

        console.log(appointments);
        

        appointments.forEach(app => {

            if (app.status == "PENDING"){html += `

                    <div class="wmp-project-card" id="wmp-appt-card-1" style="border-left: 4px solid #f59e0b; margin-bottom: 15px;">
                        <div class="wmp-card-header">
                            <div>
                                <h4>${app.projectTitle}</h4>
                                <span class="wmp-role-tag" style="background-color: #3b82f6; color: #fff;">${app.projectService}</span>
                            </div>
                            <span class="wmp-status wmp-status-pending">Awaiting Response</span>
                        </div>

                        <div class="wmp-card-description" style="margin-top: 10px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                            
                            <strong>Purpose:</strong> ${app.description}
                        </div>

                        <!-- Appointment Time & Venue Details -->
                        <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 12px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                            <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                                <i class="fa-regular fa-clock" style="margin-right: 4px;"></i> Date & Time: <span>${app.date},@ ${app.time}</span>
                            </div>
                        </div>

                        <!-- Appointment Accept / Reject Actions -->
                        <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end; gap: 8px;">
                            <button type="button" class="wmp-btn wmp-btn-success" onclick="updateAppointmentStatus(${app.appointmentId},'ACCEPTED')">
                                <i class="fa-solid fa-check" style="margin-right: 4px;"></i> Accept
                            </button>
                            <button type="button" class="wmp-btn wmp-btn-danger" onclick="updateAppointmentStatus(${app.appointmentId},'REJECTED')">
                                <i class="fa-solid fa-xmark" style="margin-right: 4px;"></i> Reject
                            </button>
                        </div>
                    </div>
            `;}else if(app.status == "ACCEPTED"){
                html2 +=`
                    <div class="wmp-project-card" id="wmp-accepted-appt-1" style="border-left: 4px solid #10b981; margin-bottom: 15px;">
                        <div class="wmp-card-header">
                            <div>
                                <h4>${app.projectTitle}</h4>
                                <span class="wmp-role-tag" style="background-color: #059669; color: #fff;">${app.projectService}</span>
                            </div>
                            <span class="wmp-status" style="background-color: #064e3b; color: #34d399; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Confirmed</span>
                        </div>

                        <div class="wmp-card-description" style="margin-top: 10px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                            <strong>Purpose:</strong> ${app.description}
                        </div>

                        <!-- Appointment Time & Venue Details -->
                        <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 12px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                            <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                                <i class="fa-regular fa-clock" style="margin-right: 4px;"></i> Date & Time: <span>${app.date},@ ${app.time}</span>
                            </div>
                        </div>

                        <!-- Action Area: Join / Meeting Link -->
                        <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end;">
                            <button type="button" class="wmp-btn wmp-btn-primary" style="background-color: #059669;" onclick="alert('Launching meeting session...')">
                                <i class="fa-solid fa-video" style="margin-right: 6px;"></i> Join Meeting
                            </button>
                        </div>
                    </div>`

            }

        });
        document.getElementById("wmpAcceptedAppointmentsList").innerHTML = html2;
        document.getElementById("wmpPendingAppointmentsList").innerHTML = html;

    } catch (error) {

        console.log(error);

    }

}
async function updateAppointmentStatus(appointmentId, status) {

    try {

        const response = await fetch(
            `http://localhost:8080/appointments/${appointmentId}/status`,
            {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(status)
            }
        );

        if (response.ok) {

            alert("Status Updated");

            loadAppointments(worker_id);

        } else {

            alert("Update Failed");

        }

    } catch (error) {

        console.log(error);

    }

}