// const annonces = document.querySelector(".section_annonces");
//
// const tl = new TimelineMax();
//
// tl.fromTo(
//   annonces,
//   1.7,
//   { y: "-50px" },
//   { y: "0%", ease: Expo.easeInOut }
// ).fromTo(
//   annonces,
//   1.7,
//   { opacity: "0" },
//   { opacity: "1", ease: Circ.easeInOut },
//   "-=1.7"
// );

const section = document.querySelector(".section_annonces > div");
const annonces = section.children;
const bouton = document.querySelector(".section_annonces > form > button");

const tl = new TimelineMax();

tl.fromTo(
  bouton,
  1.7,
  { opacity: "0" },
  { opacity: "1" }
);


for (i = 0; i < annonces.length; i++) {

  tl.fromTo(
    annonces[i],
    1.7,
    { y: "-50px" },
    { y: "0%", ease: Expo.easeInOut },
    "-=1.65"
  );


  tl.fromTo(
    annonces[i],
    1.7,
    { opacity: "0" },
    { opacity: "1", ease: Circ.easeInOut },
    "-=1.65"
  );
}
