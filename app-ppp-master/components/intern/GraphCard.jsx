import React, { useEffect } from "react";
import Chart from "chart.js";

const GraphCard = (props) => {
  const height = React.createRef();
  const weight = React.createRef();

  const graphs = (props) => {
    const myheight = height.current.getContext("2d");

    new Chart(myheight, {
      type: "line",
      data: {
        //Bring in data
        labels: props.profile.dates,
        datasets: [
          {
            label: "Talla",
            data: props.profile.height,
            fill: false,
            borderColor: "#1E5F79",
          },
        ],
      },
      options: {
        //Customize chart options
      },
    });

    const myweight = weight.current.getContext("2d");

    new Chart(myweight, {
      type: "line",
      data: {
        //Bring in data
        labels: props.profile.dates,
        datasets: [
          {
            label: "Peso",
            data: props.profile.weight,
            fill: false,
            borderColor: "#1E5F79",
          },
        ],
      },
      options: {
        //Customize chart options
      },
    });
  };

  useEffect(() => {
    graphs(props);
  }, []);

  return (
    <div className="container-graph-card">
      <div className="graph-card">
        <h3>Talla</h3>
        <canvas id="myChart1" ref={height} />
      </div>
      <div className="graph-card">
        <h3>Peso</h3>
        {/* <h1>{props.indexData}</h1> */}
        <canvas id="myChart2" ref={weight} />
      </div>
    </div>
  );
};
export default GraphCard;
