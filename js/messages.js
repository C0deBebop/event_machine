const replyLink = document.querySelectorAll('.reply');
const deleteLink = document.querySelectorAll('.delete');
const friendList = document.querySelector('#friend-list');
const messages = document.querySelector('#em-message');
const overlay = document.createElement('div');
overlay.setAttribute('id', 'overlay');

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