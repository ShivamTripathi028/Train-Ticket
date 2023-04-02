quotearr = [
  {
    quote:
      "“And then there is the most dangerous risk of all – the risk of spending your life not doing what you want on the bet you can buy yourself the freedom to do it later.”",
    author: "Randy Komisar",
  },
  {
    quote:
      "“I see my path, but I don’t know where it leads. Not knowing where I’m going is what inspires me to travel it.”",
    author: "Rosalia de Castro",
  },
  {
    quote:
      "“We live in a wonderful world that is full of beauty, charm, and adventure. There is no end to the adventures we can have if only we seek them with our eyes open.”",
    author: "Jawaharial Nehru",
  },
  {
    quote:
      "“Our happiest moments as tourists always seem to come when we stumble upon one thing while in pursuit of something else.”",
    author: "Lawrence Block",
  },
  {
    quote:
      "“Because in the end, you won’t remember the time you spent working in the office or mowing your lawn. Climb that goddamn mountain.”",
    author: "Douglas Adams",
  },
  {
    quote:
      "“The difference between a tourist and a traveler is that a tourist doesn’t know where he’s been and a traveler doesn’t know where he’s going.”",
    author: "Randy Komisar",
  },
  {
    quote: "“A ship in harbor is safe, but that’s not what ships are for.”",
    author: "William Shedd",
  },
];

function getQuote() {
  let q = document.getElementById("quote");
  let a = document.getElementById("author");
  quoteObject = quotearr[Math.floor(Math.random() * quotearr.length)];
  q.innerHTML = quoteObject.quote;
  a.innerHTML = "-" + quoteObject.author;
  console.log(quotearr[random]);
  console.log((random = Math.floor(Math.random * 10)));
}
