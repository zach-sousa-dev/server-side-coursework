document.getElementById('main-form').addEventListener('submit', function(event) {
    event.preventDefault();

    fetch("./calculate_grade.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            number: document.getElementById("number-input").value
        })
    }).then( (res) => {
        return res.json();
    }).then( (data) => {
        document.getElementById("output").innerHTML = data.result == 0 ? "Invalid, try something else." : data.result;
    });
});