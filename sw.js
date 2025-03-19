self.addEventListener("push", function(event) {
    const eventData = event.data.json();

    self.registration.showNotification(eventData.title, {
        body: eventData.body,
        icon: "img/event-icon.png",
        sound: "sounds/gwenchana.mp3"
    });

    // Play alert sound (triggers even if tab is inactive)
    self.registration.getNotifications().then(notifications => {
        if (notifications.length > 0) {
            const sound = new Audio("sounds/gwenchana.mp3");
            sound.play().catch(err => console.log("Audio autoplay blocked:", err));
        }
    });
});