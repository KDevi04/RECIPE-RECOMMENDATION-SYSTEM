const previousEl = document.getElementById('previous');
previousEl.addEventListener('click', () => {
    previousQuestion();
});

function previousQuestion() {
    currentQuestion--;
    if (currentQuestion < 0) {
        currentQuestion = 0;
    }
    optionEl.textContent = '';
    showQuestion();
}

function optionSelected(event) {
    const selectedOption = event.target.textContent;
    // Handle selected option as needed
    console.log('Selected option:', selectedOption);
}
const quesJSON = [
    {
      options: ['Under 25 years', '26-35 years ', '36-50 years', 'Above 50 years'],
      question:
        "HOW OLD ARE YOU?",
    },
    {
      options: [
        'below 40 kg',
        '41-55 kg',
        '56-70 kg',
        '71-85 kg',
        '86-100 kg',
        'above 100 kg'
      ],
      question:
        "Select your current weight below(in kg)!!",

    },
    {
      options: [
        'Weight Loss plan',
        'Weight gain plan'
      ],
      question:
        'Please choose your Diet Plan (from the given options)',
    },
    
  ];

      let currentQuestion = 0;
  
      //Accessing all the elements:
      const questionEl = document.getElementById("question");
      const optionEl = document.getElementById("options");
      const nextEl = document.getElementById('next');
      showQuestion();
      
      nextEl.addEventListener('click', ()=>{
        nextQuestion();
      } );
  
      function showQuestion(){
         // Destructuring the object
       const{correctAnswer, options, question} = quesJSON[currentQuestion];
  
        //Setting question text content
      questionEl.textContent = question; 
      
      const shuffledOptions = shuffleOptions(options);
      
          //Populating the Options div with the buttons.
          shuffledOptions.forEach((opt) => {
            const btn = document.createElement('button');
            btn.textContent = opt;
            optionEl.appendChild(btn);
        });
    }
  
    function nextQuestion(){
      currentQuestion++;
      optionEl.textContent = '';
      if(currentQuestion>=quesJSON.length){
        questionEl.textContent = 'Quiz Completed!!';
        nextEl.remove();
      } 
      else{
        showQuestion();
      }
  
    }
  
  //Shuffling the Options
  function shuffleOptions(options) {
      for (let i = options.length - 1; i >= 0; i--) {
        const j = Math.floor(Math.random() * i + 1);
        [options[i], options[j]] = [
          options[j],
          options[i],
        ];
      }
      return options;
    }
    
  //   shuffleOptions([1, 2, 3, 4, 5]);