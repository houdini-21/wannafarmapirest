const btn = document.getElementById("button");

document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();
  btn.value = "Sending...";
  const serviceID = "default_service";
  const templateID = "template_r69wdy7";
  emailjs.sendForm(serviceID, templateID, this).then(
    () => {
      btn.innerText = "Email has be send!";
      alert("Sent!");

      location.reload();
    },
    (err) => {
      btn.innerText = "Email has be send!";
      alert(JSON.stringify(err));

  location.reload();
    }
  );
});
