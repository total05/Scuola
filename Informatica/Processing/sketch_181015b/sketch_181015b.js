function setup() {
  angleMode(DEGREES);
  createCanvas(500,500);
}

function draw() {

  m = minute();
  s = second();
  noFill();
  stroke(255,255,255);
  strokeWeight(4);
  sMapped = map(s,0,60,-90,270);
  console.log(s);
  arc(250,250,300,300,-90,sMapped);
}
