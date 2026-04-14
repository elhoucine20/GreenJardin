fetch('/une-url', {
    method: 'POST',
    body: JSON.stringify({ data: 'value' })
})
.then(response => response.json())  // Server répond en JSON
.then(data => {
    // Update le DOM ici
})