const canvas = document.getElementById("tacticCanvas");
const ctx = canvas.getContext("2d");

let drawing = false;
let tool = "draw";
let players = [];
let draggingPlayer = null;

// =======================
// CAMPO
// =======================
function drawField() {
    ctx.fillStyle = "#166534";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.strokeStyle = "white";
    ctx.lineWidth = 2;

    // Línea central
    ctx.beginPath();
    ctx.moveTo(canvas.width / 2, 0);
    ctx.lineTo(canvas.width / 2, canvas.height);
    ctx.stroke();

    // Círculo central
    ctx.beginPath();
    ctx.arc(canvas.width / 2, canvas.height / 2, 60, 0, Math.PI * 2);
    ctx.stroke();

    // Porterías
    ctx.strokeRect(0, canvas.height / 2 - 50, 60, 100);
    ctx.strokeRect(canvas.width - 60, canvas.height / 2 - 50, 60, 100);
}

// =======================
// JUGADORES
// =======================
function drawPlayers() {
    players.forEach(player => {
        ctx.beginPath();
        ctx.arc(player.x, player.y, 12, 0, Math.PI * 2);
        ctx.fillStyle = player.color;
        ctx.fill();

        ctx.fillStyle = "white";
        ctx.font = "10px Arial";
        ctx.fillText(player.number, player.x - 5, player.y + 4);
    });
}

// =======================
// REDIBUJAR TODO
// =======================
function redraw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawField();
    drawPlayers();
}

// =======================
// TOOLS
// =======================
function setTool(selectedTool) {
    tool = selectedTool;
}

// =======================
// EVENTOS
// =======================
canvas.addEventListener("mousedown", (e) => {
    const x = e.offsetX;
    const y = e.offsetY;

    // detectar si clic en jugador
    draggingPlayer = players.find(p => {
        return Math.hypot(p.x - x, p.y - y) < 12;
    });

    if (draggingPlayer) return;

    if (tool === "player") {
        players.push({
            x,
            y,
            color: document.getElementById("colorPicker").value,
            number: players.length + 1
        });
        redraw();
    }

    if (tool === "draw") {
        drawing = true;
        ctx.beginPath();
        ctx.moveTo(x, y);
    }
});

canvas.addEventListener("mousemove", (e) => {
    const x = e.offsetX;
    const y = e.offsetY;

    // mover jugador
    if (draggingPlayer) {
        draggingPlayer.x = x;
        draggingPlayer.y = y;
        redraw();
        return;
    }

    if (!drawing) return;

    ctx.strokeStyle = document.getElementById("colorPicker").value;
    ctx.lineWidth = 3;
    ctx.lineTo(x, y);
    ctx.stroke();
});

canvas.addEventListener("mouseup", () => {
    drawing = false;
    draggingPlayer = null;
});

canvas.addEventListener("mouseleave", () => {
    drawing = false;
    draggingPlayer = null;
});

// =======================
// LIMPIAR
// =======================
function clearCanvas() {
    players = [];
    redraw();
}

// =======================
// INIT
// =======================
drawField();