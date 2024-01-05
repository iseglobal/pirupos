new Chart(document.getElementById("chartjs-grafico-ventas"), {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
    ],
    datasets: [
      {
        label: "This year",
        backgroundColor: "#ff0055",
        borderColor: "#ff0055",
        hoverBackgroundColor: "#ff0055",
        hoverBorderColor: "#ff0055",
        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
        // barPercentage: 0.75,
        // categoryPercentage: 0.5,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
  },
});

new Chart(document.getElementById("chartjs-top-productos"), {
  type: "pie",
  data: {
    labels: ["Fierro", "Cemento", "Clavo"],
    datasets: [
      {
        backgroundColor: ["#ff0055", "#ffee22", "#FF6500"],
        borderColor: ["#ff0055", "#ffee22", "#FF6500"],
        data: [40, 50, 100],
        // barPercentage: 0.75,
        // categoryPercentage: 0.5,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
  },
});
