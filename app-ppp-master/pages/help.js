import React, { useState, useEffect } from "react";
import TitleScreen from '../components/intern/TitleScreen'
import HelpCard from "../components/intern/HelpCard";
import { createClient } from "contentful";




const Help= props => {

    const [help, setHelp] = useState([])

    const printCards =(article)=>{
        const data = article.map((element,index) => (
            <HelpCard
            key={element.sys.id}
            question={element.fields.pregunta}
            answer={element.fields.respuesta}
            index={index}
            />
            ))
        setHelp(data);
        }
        
        useEffect(() => {
            var client = createClient({
              space: "cjl0069kf3mf",
              accessToken:
                "IMlY2uj_8T2LHYlbq2Bq8LI14otz0WRz7MYOhb53wwo"
            });
            client.getEntries({content_type: 'pqrs'})
            .then(function(entries) {
                printCards(entries.items)
            })
          }, [])

    return (
        <div className="help">
            <TitleScreen title="Preguntas frecuentes"/>
            <div className="help-container">
                {help}
            </div>
        </div>
    )
}

export default Help
