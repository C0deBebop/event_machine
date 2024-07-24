let friends = [];
const replyLink = document.querySelectorAll('.reply');
const deleteLink = document.querySelectorAll('.delete');
const friendList = document.querySelector('#friend-list');
const messages = document.querySelector('#em-message');
const overlay = document.createElement('div');
overlay.setAttribute('id', 'overlay');


function messageWindow(){
    const windowDiv = createWindow();
    const messageWindow = document.createElement('div');
    const messageComponent= document.createElement('div');
    const messageComponentHeader = document.createElement('div');
    const heading = document.createElement('h4');
    const headingText = document.createTextNode('Message');
    const textField = document.createElement('textarea');
    const sendMessageButton = document.createElement('button');
    const sendMessageText = document.createTextNode('send');
    const image = document.createElement('img');
    const span = document.createElement('span');
    const spanText = document.createTextNode(friends[0].names);
    const spanArrow = document.createElement('span');
    const spanArrowText  = document.createTextNode("\u25BE"); 
    windowDiv.setAttribute('id', 'message-container');
    messageWindow.setAttribute('id', 'message-window');
    messageComponent.setAttribute('id', 'message-component');
    messageComponentHeader.setAttribute('id', 'message-component-header')
    textField.setAttribute('name', 'message');
    textField.setAttribute('placeholder', 'Hola....');
    image.setAttribute('src', friends[0].images);
    spanArrow.setAttribute('id', 'arrow');    
    heading.appendChild(headingText);
    messageWindow.appendChild(heading);
    sendMessageButton.appendChild(sendMessageText);
    span.appendChild(spanText);
    spanArrow.appendChild(spanArrowText);
    messageComponentHeader.appendChild(image);
    messageComponentHeader.appendChild(span);
    messageComponentHeader.appendChild(spanArrow);
    messageComponent.appendChild(messageComponentHeader);
    messageComponent.appendChild(textField);
    messageComponent.append(sendMessageButton);
    messageWindow.appendChild(messageComponent);
    windowDiv.appendChild(messageWindow);
    overlay.appendChild(windowDiv);
    document.querySelector('body').appendChild(overlay);
    friendListDropdown(spanArrow);
}

function friendListDropdown(arrow){
   arrow.addEventListener('click', (e) => {
      e.preventDefault();
      
   })
}


function sendMessage(){

}

function friendListMenu(){

}

function closeWindow(){
    document.querySelector('#overlay').remove();
}

function friendWindow(){
    windowDiv.setAttribute('', '');
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

 friendList.addEventListener('click', (e) => {
    e.preventDefault();
    friendWindow();
});

messages.addEventListener('click', (e) => {
    e.preventDefault();
    messageWindow();    
});

replyLink.forEach((replyButton) => {
    replyButton.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('body').appendChild(overlay);
    })
});

deleteLink.forEach((deleteButton) => {
    deleteButton.addEventListener('click', (e) => {
        e.preventDefault();
        //add method to delete message
    })
});

window.addEventListener('load', () => {
    const noMessages = document.querySelector('#content-card');
    const friendImages = document.querySelectorAll('.images');
    const friendNames = document.querySelectorAll('.names'); 
    if(!noMessages){
       friendImages.forEach((images, i) => {
           var img = images.getAttribute('src');
           friends.push({'names' : friendNames[i].innerHTML, 'images' : img});
          
       });
   }
})