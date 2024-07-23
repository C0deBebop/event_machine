const replyLink = document.querySelectorAll('.reply');
const deleteLink = document.querySelectorAll('.delete');
const friendList = document.querySelector('#friend-list');
const messages = document.querySelector('#em-message');
const overlay = document.createElement('div');
overlay.setAttribute('id', 'overlay');


function messageWindow(){
    const windowDiv = createWindow();
    const heading = document.createElement('h4');
    const headingText = document.createTextNode('Message');
    windowDiv.getAttribute('id', 'message-window');
    heading.appendChild(headingText);
    windowDiv.appendChild(heading);
    overlay.appendChild(windowDiv);
    document.querySelector('body').appendChild(overlay);
}

function closeWindow(){
    document.querySelector('#overlay').remove();
}


function createWindow() {
    const windowDiv = document.createElement('div');
    const closeButton = document.createElement('a');
    const closeButtonText = document.createTextNode('X')
    closeButton.setAttribute('id', 'close');
    closeButton.setAttribute('href', '');
    closeButton.appendChild(closeButtonText);
    windowDiv.appendChild(closeButton);
    closeButton.addEventListener('click', (e) => {
       e.preventDefault();
       closeWindow();
    })
    return windowDiv;   
 }