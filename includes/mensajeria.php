<div id="mesajeria-menu" class="mesajeria-menu" style="display: none;">
    <!-- <button id="mainButton" class="main-button">
        <i class="acuarela acuarela-Mensajes"></i>
    </button> -->

    <div class="icons">
        <ul>
            <li id="buscar-mensajeria">
                <i class="acuarela acuarela-Buscar"></i>
            </li>
            <li id="agregar-mensajeria">
                <i class="acuarela acuarela-Agregar"></i>
            </li>
            <li class="chat-icon">
                <img src="./img/Chat.png" alt="">
            </li>
            <li class="chat-icon">
                <img src="./img/chat2.png" alt="">
            </li>
            <li class="chat-icon">
                <img src="./img/Chat3.png" alt="">
            </li>
            <li id="opcines-mensajeria">
                <i class="acuarela acuarela-Opciones"></i>
            </li>

        </ul>
    </div>
    <div id="chats-buscados" class="chats-buscados" style="display: none;">
        <div class="buscador-mensajeria">
            <i class="acuarela acuarela-Buscar"></i>
            <input type="text">
            <i class="acuarela acuarela-Cancelar"></i>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/Chat.png" alt="">
            <p>Nombre persona</p>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/chat2.png" alt="">
            <p>Nombre persona</p>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/Chat3.png" alt="">
            <p>Nombre persona</p>
        </div>
    </div>

    <div id="chats-agregados" class="chats-buscados" style="display: none;">
        <div class="buscador-mensajeria">
            <i class="acuarela acuarela-Agregar"></i>
            <input type="text">
            <i class="acuarela acuarela-Cancelar"></i>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/Chat.png" alt="">
            <p>Nombre persona</p>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/chat2.png" alt="">
            <p>Nombre persona</p>
        </div>
        <div class="chats-mensajeria">
            <img src="./img/Chat3.png" alt="">
            <p>Nombre persona</p>
        </div>
    </div>

    <div id="chat-individual" class="chat-individual" style="display: none;">
        <div class="info-chat">
            <img id="imgUser" src="./img/Chat.png" alt="">
            <p id="userChat"></p>
            <!-- <i class="acuarela acuarela-Usuario"></i> -->
            <i id="closeChat" class="acuarela acuarela-Cancelar"></i>
        </div>
        <div id="messages" class="chat-mensajes">
            <div class="mensaje-enviado">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima asperiores repudiandae nisi magnam minus et, adipisci numquam id aspernatur totam blanditiis, animi, dolorem fugit dolores! Commodi voluptates sint dolorem magnam.

                </p>
                <p class="chat-hora">00:00AM</p>
            </div>
            <div class="mensaje-recibido">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima asperiores repudiandae nisi magnam minus et, adipisci numquam id aspernatur totam blanditiis, animi, dolorem fugit dolores! Commodi voluptates sint dolorem magnam.

                </p>
                <p class="chat-hora">00:00AM</p>
            </div>
            <div class="mensaje-enviado">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima asperiores repudiandae nisi magnam minus et, adipisci numquam id aspernatur totam blanditiis, animi, dolorem fugit dolores! Commodi voluptates sint dolorem magnam.

                </p>
                <p class="chat-hora">00:00AM</p>
            </div>
        </div>
        <div class="chat-barra-mensajes">
            <input id="messageInput" type="text">
            <i id="sendBtn" class="acuarela acuarela-Enviar"></i>
            <!-- <i class="acuarela acuarela-Adjuntar"></i> -->
        </div>
    </div>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>

</div>