/* ---------- QUIZ ---------- */
function calculateScore() {
    let score = 0;
    for (let i = 1; i <= 10; i++) {
        const sel = document.querySelector(`input[name="q${i}"]:checked`);
        if (sel) {
            const correct = document.querySelector(`input[name="correct${i}"]`).value;
            if (sel.value === correct) score++;
        }
    }
    document.getElementById('score').innerText = `You scored ${score} / 10 !`;
}

/* ---------- CHATBOT ---------- */
function toggleChatbot() {
    const bot = document.getElementById('chatbot');
    bot.style.display = (bot.style.display === 'block') ? 'none' : 'block';
}
function sendMessage() {
    const input = document.getElementById('userInput');
    const txt   = input.value.trim().toLowerCase();
    if (!txt) return;
    const out   = document.getElementById('chatOutput');
    out.innerHTML += `<p><strong>You:</strong> ${txt}</p>`;

    let reply = "I’m not sure about that. Try asking about recycling, impact, or definition.";
    if (txt.includes('what is e-waste') || txt.includes('definition')) {
        reply = "E-waste is any discarded electrical or electronic device (phones, laptops, TVs, etc.).";
    } else if (txt.includes('recycle') || txt.includes('dispose')) {
        reply = "Take e-waste to a certified recycling center. Many cities have drop-off points.";
    } else if (txt.includes('impact') || txt.includes('harm')) {
        reply = "E-waste releases toxins like lead & mercury, polluting soil, water, and harming health.";
    } else if (txt.includes('reduce') || txt.includes('manage')) {
        reply = "Repair, reuse, donate, or sell working devices. Buy durable products.";
    }

    out.innerHTML += `<p><strong>Bot:</strong> ${reply}</p>`;
    out.scrollTop = out.scrollHeight;
    input.value = '';
}