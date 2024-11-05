
    const hamburger = document.querySelector('.hamburger');
    const backBtn = document.querySelector('.back-btn');
    const nav = document.querySelector('nav');

    hamburger.addEventListener('click', () => {
        nav.classList.toggle('active');
        hamburger.style.display = 'none';
        backBtn.style.display = 'block';
    });

    backBtn.addEventListener('click', () => {
        nav.classList.remove('active');
        hamburger.style.display = 'block';
        backBtn.style.display = 'none';
    });

    document.querySelector('.disable').addEventListener('click', () => {
    document.querySelector('.dialog').classList.remove('active');
    document.querySelector('.show_error').innerText="";
    hide_loading();
    });

    function show_loading(){
    document.querySelector('.load').classList.add('active');
    }

    function hide_loading(){
    document.querySelector('.load').classList.remove('active');
    }

    document.getElementById('pdfFile').addEventListener('change', function () {
        const fileName = this.files[0] ? this.files[0].name : 'Select your pdf file';
        document.querySelector('.show').textContent = fileName;
    });



    function exit(){
    document.querySelector('.setTime').classList.remove('active');
    }


    let questionArray = [];

    async function uploadPdf() {
        show_loading();
        const pdfFile = document.getElementById('pdfFile').files[0];
    
        if (!pdfFile) {
            document.querySelector('.show_error').innerText = "PDF file is not selected";
            document.querySelector('.dialog').classList.add('active');
            hide_loading();
            return;
        }
    
        const formData = new FormData();
        formData.append('pdf', pdfFile);
    
        try {
            const response = await fetch('https://quiz-setter.onrender.com/upload', {
                method: 'POST',
                body: formData
            });
    
            if (response.ok) {
                const data = await response.json();
                hide_loading();
    
                // Send question data to `set_questions.php` to save it in PHP session
                const saveResponse = await fetch('header/script/set_questions.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ questions: data.questions })
                });
    
                if (saveResponse.ok) {
                    window.location.href = "generated_question.php";
                } else {
                    document.querySelector('.show_error').innerText = "Failed to save questions in PHP";
                    document.querySelector('.dialog').classList.add('active');
                }
    
            } else {
                hide_loading();
                document.querySelector('.show_error').innerText = "Oops! something went wrong, try again";
                document.querySelector('.dialog').classList.add('active');
            }
        } catch (error) {
            hide_loading();
            document.querySelector('.show_error').innerText = "Oops! Internet connection failed, try again";
            document.querySelector('.dialog').classList.add('active');
            console.error(error);
        }
    }
     