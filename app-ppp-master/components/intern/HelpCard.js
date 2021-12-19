import React from "react";

const HelpCard = props => {
    
    const showAnswer = () => {
        const plus = document.querySelectorAll(".fa-plus")
        const minus = document.querySelectorAll(".fa-minus")
        const answers = document.querySelectorAll('.help-answer')
        if (minus[props.index].style.display === 'block') {
            minus[props.index].style.display = 'none'
            plus[props.index].style.display = "block"
            answers[props.index].style.display = 'none'
            
        } else {
            minus.forEach((element, index) => {
                element.style.display = "none"
                answers[index].style.display = 'none'
                plus[index].style.display = 'block'
            })

            plus[props.index].style.display = "none"
            minus[props.index].style.display = "block"
            answers[props.index].style.display = 'flex'
        }
    }



    return (
        <div className="help-card">
            <div className="help-question" onClick={showAnswer}>
                <h4>{props.question}</h4>
                <i className="fas fa-plus"></i>
                <i className="fas fa-minus"></i>
            </div>
            <div className="help-answer">
                <p>{props.answer}</p>
            </div>
        </div>
    );
};

export default HelpCard;
