const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const user_id=urlParams.get('id');

console.log(user_id)

function navbarShift(name) {
    console.log("mn enawa");
    if (name === 'home') {
        window.location.href ="http://localhost:3000/User_Feature/home.php?id="+user_id;
    } else if (name === 'service') {
        window.location.href ="http://localhost:3000/User_Feature/services.php?id="+user_id;
    } else if (name === 'myprojects') {
        window.location.href ="http://localhost:3000/User_Feature/myProjects.php?id="+user_id;
    } else if(name === 'chat'){
        window.location.href ="http://localhost:3000/User_Feature/chat.php?id="+user_id;
    }else if(name === 'appointment'){
        window.location.href ="http://localhost:3000/User_Feature/appointment.php?id="+user_id;
    }else if(name === 'payment'){
        window.location.href ="http://localhost:3000/User_Feature/payment.php?id="+user_id;
    }else{
        window.location.href ="http://localhost:3000/User_Feature/about.php?id="+user_id;
    }
}

//user name
fetch("http://localhost:8080/users/" + user_id)
.then(response => response.json())
.then(user => {

    document.getElementById("username").innerHTML = user.name;

});

if(section == "projects"){
    loadProject();
}else if (section == "chat") {
    loadUserInProgressProjects();
}else if (section == "appoinment") {
    loadProjectSelection();
    loadUserProjectsAndAppointments();
}

function request() {
        
        const projectTitle = document.getElementById('projTitle').value;
        const service = document.getElementById('projService').value;
        const about = document.getElementById('projAbout').value;
        let extraDetails = "";
        if (service === 'DATA_ANALYSIS' ) {
            extraDetails = document.getElementById('daDatasetLink').value;
        } else if (service === 'CONSULTANT_INTERMEDIATE') {
            extraDetails = document.getElementById('ciDatasetLink').value;
        } else if (service === 'ACADEMIC_RESEARCH') {
            extraDetails = document.getElementById('arSubjectArea').value;
        }else{
            extraDetails = "none";
        }
        const targetDeadline = document.getElementById('projDeadline').value;
        const budgetRange = document.getElementById('projBudget').value;
        const status = "PENDING";
        
        console.log(projectTitle,service,about,targetDeadline,budgetRange ,'ssss');
        fetch("http://localhost:8080/projects/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                projectTitle,
                service,
                about,
                extraDetails,
                targetDeadline,
                budgetRange,
                status,
                user: {
                    userId: user_id
                }
            })
        })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error(error));
        loadProject();
    }
    
function loadProject() {
    
    fetch("http://localhost:8080/projects/user/"+user_id)
    .then(response => response.json())
    .then(projects => {
        
        let activeCards="";
        let pendingCards="";
        let canceledCards="";
        projects.forEach(project => {

            if (project.status === "PENDING") {
                pendingCards += `
                    <div class="usr-portfolio-card text-pending">
                        <div class="card-meta-row">
                            <h4>${project.projectTitle}</h4>
                            <span class="status-tag tag-pending">Review Backlog</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: #f59e0b; font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service Staged: ${project.service}</span></p>
                        <p>${project.about}</p>
                        <div class="card-action-routing-deck disabled-deck">
                            <span class="action-route-link locked-link"><i class="fa-solid fa-lock"></i> Chat Pending</span>
                            <span class="action-route-link locked-link"><i class="fa-solid fa-lock"></i> Fees Locked</span>
                        </div>
                    </div>
                `
            } else if(project.status === "IN_PROGRESS"){
                activeCards += `
                    <div class="usr-portfolio-card text-active">
                        <div class="card-meta-row">
                            <h4>${project.projectTitle}</h4>
                            <span class="status-tag tag-active">Active Execution</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: #10b981; font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service: ${project.service}</span></p>
                        <p>${project.about}</p>
                        
                        <div class="card-action-routing-deck">
                            <a href="chat.php" class="action-route-link link-chat"><i class="fa-solid fa-comments"></i> Live Chat</a>
                            <a href="payment.php" class="action-route-link link-pay"><i class="fa-solid fa-credit-card"></i> Payments</a>
                            <a href="exploreProjects.php" class="action-route-link" style="color: #10b981; margin-left: auto; font-weight: 700;"><i class="fa-solid fa-circle-right"></i> Explore project</a>
                        </div>
                    </div>
                `
                
            }else if (project.status === "CANCELLED") {
                canceledCards +=`
                    <div class="usr-portfolio-card text-cancelled">
                        <div class="card-meta-row">
                            <h4>${project.projectTitle}</h4>
                            <span class="status-tag tag-cancelled">Canceled</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: #ef4444; font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service: ${project.service}</span></p>
                        <p>${project.about}</p>

                        <div class="card-action-routing-deck disabled-deck">
                            <span class="action-route-link locked-link">
                                <i class="fa-solid fa-ban"></i> Project Canceled
                            </span>
                            <span class="action-route-link locked-link">
                                <i class="fa-solid fa-file-circle-xmark"></i> Closed
                            </span>
                        </div>

                    </div>
                `
            }
        });
        document.getElementById('pendingCards').innerHTML=pendingCards;
        document.getElementById('activeCards').innerHTML=activeCards;
        document.getElementById('canceledCards').innerHTML=canceledCards;
    });
}

async function loadUserInProgressProjects() {

    try {

        const response = await fetch(
            `http://localhost:8080/projects/user/${user_id}/in-progress`
        );

        if (!response.ok) {
            throw new Error("Failed to load projects");
        }

        const projects = await response.json();


        let html = "";

        console.log(projects);
        
        let chat;
        projects.forEach(project => {
            chat = project.chatSession;
            html += `
                <div class="chat-vector-card" onclick="loadMessages('${chat.chatId }','${project.projectTitle}','${project.status}',this)" style="cursor: pointer; background: var(--bg-dark); border: 1px solid #1e293b; padding: 15px; border-radius: 10px; transition: all 0.2s;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 6px;">
                        <strong style="color: white; font-size: 13px; display: block;">${project.projectTitle}</strong>
                        <span style="font-size: 9px; padding: 2px 6px; background: rgba(16, 185, 129, 0.08); color: #10b981; border-radius: 4px; font-weight: 600;">Active</span>
                    </div>
                    <span style="font-size: 11px; color: var(--text-muted); display: block;"><i class="fa-solid fa-user-tie"></i> ${project.service}</span>
                </div>
            `;

        });

         document.getElementById("userInProgressProjects").innerHTML = html;

    } catch (error) {

        console.error(error);

        document.getElementById("userInProgressProjects").innerHTML =
            "<p>Unable to load projects.</p>";

    }
}
let chatId=0;
async function loadMessages(chatid, projectTitle, status, card) {

    activateChatChannel(card, chatId, projectTitle, status);


    chatId=chatid
    const response = await fetch(
        `http://localhost:8080/messages/chat/${chatId}`
    );

    const messages = await response.json();

    let html = "";

    messages.forEach(msg=>{

        if (msg.senderType === 'USER') {
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

async function sendUserMessage() {


    const message = {
        senderType: "USER",
        content: document.getElementById("inputChatMessage").value
    };

    const response = await fetch(
        `http://localhost:8080/messages/${chatId}`,
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(message)
        }
    );

    const data = await response.json();


}

async function loadProjectSelection() {
    try {

        const response = await fetch(
            `http://localhost:8080/projects/user/${user_id}/in-progress`
        );

        if (!response.ok) {
            throw new Error("Failed to load projects");
        }

        const projects = await response.json();


        let html = `<option value="" disabled selected>-- Select One of Your Active Projects --</option>`;

        projects.forEach(project => {

            html += `
                <option value="${project.projectId}">${project.projectTitle}</option>
            `;

        });

         document.getElementById("projectSelect").innerHTML = html;

    }catch (error) {

        console.error(error);

        document.getElementById("projectSelect").innerHTML =
            "<p>Unable to load projects.</p>";

    }
}


async function requestAppointment() {

    const appointment = {
        date: document.getElementById("appDate").value,
        time: document.getElementById("appTime").value,
        description: document.getElementById("description").value,
        durationMinutes: document.getElementById("durationMinutes").value,
        project: {
            projectId: document.getElementById("projectSelect").value
        }
    };

    try {

        const response = await fetch("http://localhost:8080/appointments", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(appointment)
        });

        if (response.ok) {
            alert("Appointment request sent.");
        } else {
            alert("Failed to send request.");
        }

    } catch (error) {
        console.log(error);
    }
}

async function loadUserProjectsAndAppointments() {

    try {

        const response = await fetch(`http://localhost:8080/projects/user/${user_id}/appointments`);

        if (!response.ok) {
            throw new Error("Failed to load data");
        }

        const data = await response.json();

        let pendingAppointments = "";
        let acceptedAppointments = "";
        let rejectedAppointments = "";

        data.forEach(appointment =>{
            if (appointment.appointmentStatus === "PENDING") {
                pendingAppointments +=`
                <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                    <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">${appointment.projectTitle}</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                        <i class="fa-regular fa-calendar"></i> ${appointment.date} @ ${appointment.time} • <span style="color: #38bdf8;">Online</span>
                    </div>
                </div>`
            } else if(appointment.appointmentStatus === "ACCEPTED"){
                acceptedAppointments +=`
                <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                    <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">${appointment.projectTitle}</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                        <i class="fa-regular fa-calendar"></i>${appointment.date} @ ${appointment.time} • <span style="color: #a78bfa;">Physical</span>
                    </div>
                </div>`
            }else if(appointment.appointmentStatus === "REJECTED"){
                rejectedAppointments +=`
                <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                    <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">${appointment.projectTitle}</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                        <i class="fa-regular fa-calendar"></i> ${appointment.date} @ ${appointment.time} • <span style="color: #ef4444;">Cancelled by woker</span>
                    </div>
                </div>`
            }
        })

        document.getElementById("conformedCards").innerHTML = acceptedAppointments;
        document.getElementById("penddingCards").innerHTML = pendingAppointments;
        document.getElementById("cancelledCards").innerHTML = rejectedAppointments;
        

    } catch (error) {
        console.error(error);
    }
}

