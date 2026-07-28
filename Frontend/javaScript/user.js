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