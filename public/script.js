let localityInput = document.getElementById('locality_name');
let datalist = document.getElementById('locality');
localityInput.addEventListener('input', async function () {
  let locality = localityInput.value;
  let url = `https://api.tomtom.com/search/2/search/${encodeURIComponent(locality)}.json?key=MqZHrYthLN7RSxSAN8jGZFCldqWYoi99&type=Geography&entityTypeSet=Municipality&countrySet=ITA&typeahead=true`;
  let response = await fetch(url);

  if (response.ok) { // se l'HTTP-status è 200-299
    // ricevi il body della risposta (il metodo sarà spiegato di seguito)
    let json = await response.json();
    console.log(json);
    console.log(json.results);

    for (let i = 0; i < json.results.length; i++) {
      let suggest = document.createElement('option');
      suggest.value = json.results[i].address.municipality + ', ' + json.results[i].address.countrySubdivision;
      datalist.appendChild(suggest);
    }

  } else {
    alert("HTTP-Error: " + response.status);
  }
})
