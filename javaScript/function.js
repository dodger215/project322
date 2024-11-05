const fileUpload = document.querySelector('.fileUpload');
const file_input = document.querySelector('.fileinput');

const clickToUpload = function () {
    file_input.click();
    if(file_input.files.length > 0){
        const name = file_input.files[0].name;
        fileUpload.textContent = `Selected file: ${name}`;
    }
}
fileUpload.addEventListener('click', clickToUpload);



document.querySelector('.generate').addEventListener('submit', async function(Event) {
    
    Event.preventDefault();

    const file = file_input.files[0];
    
    if (!file) {
        alert('Please select a file.');
        return;
    }
    
    const formData = new FormData();
    formData.append('file', file);
    try {
        const response = await fetch('The API link', {
                method: 'POST',
                body: formData,  // Send FormData with the file
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': '' //the API requires authentication or not
                }
    });
    
    const result = await response.json();  // Parse the JSON response
    if (response.ok) {

        const data = await response.json();
        console.log(data);
        return data;
        alert('File uploaded successfully!');
    
    } else {
        alert(`Error: ${result.message}`);
        }
    } catch (error) {
        alert(`Network error: ${error.message}`);
    }
    
});

(function (){
    async function fetchData() {
        try {
            const response = await fetch(''); 
            if (!response.ok) {
                alert('Network response was not ok');
            }
            const data = await response.json();

            // Display the data on the page
            const apiDataList = document.querySelector('get');
    
            data.forEach(item => {
                for(var index = 1; index <= data.index; index++){ // for the numbering of the questions
                    apiDataList.innerHTML =`<h2>Q${index}. ${query}</h2>
                    <div class="radio-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question1" id="optionA" value="A">
                            <label class="form-check-label" for="optionA">A. H<sub>2</sub>O</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question1" id="optionB" value="B">
                            <label class="form-check-label" for="optionB">B. C<sub>2</sub>B</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question1" id="optionC" value="C">
                            <label class="form-check-label" for="optionC">C. OH<sub>2</sub>COOOOH</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question1" id="optionD" value="D">
                            <label class="form-check-label" for="optionD">D. H<sub>2</sub>Cl</label>
                        </div>
                    </div>
                </div>`;
                }
                
            });
        } catch (error) {
            console.error('Error fetching data:', error);
            alert(`Error fetching data: ${error.message}`);
        }
    }

    


}());





