function sayHello() {
    alert('Hello Javascript World!');
}

// document.getElementById("say_hello_button").addEventListener("click", sayHello);
$('#say_hello_button').on("click", sayHello);