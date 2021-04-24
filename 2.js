function urutKata(input) {
	const kata = input.split(" ");
	const baru = [];
	let number = 1;

	if(input == "") return "";

	while (true) {
		let i = 0;
			while (i < kata.length) {
				if(kata[i].includes(number)) {
					baru.push(kata[i]);
				}
				i++;
			}
		if(number == kata.length) break;
		number++;
	}

	return baru.join(" ");
}


console.log(urutKata("ib2u in1i b3udi"));
console.log(urutKata("ta3hun menjela2ng se1lamat b4aru"));
console.log(urutKata(""));