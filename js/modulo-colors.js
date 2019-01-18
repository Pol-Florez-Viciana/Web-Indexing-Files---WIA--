function RGBToHSL(r, g, b) {
	var
	min = Math.min(r, g, b),
	max = Math.max(r, g, b),
	diff = max - min,
	h = 0, s = 0, l = (min + max) / 2;

	if (diff != 0) {
		s = l < 0.5 ? diff / (max + min) : diff / (2 - max - min);

		h = (r == max ? (g - b) / diff : g == max ? 2 + (b - r) / diff : 4 + (r - g) / diff) * 60;
	}

	return [h, s, l];
}

function HSLToRGB(h, s, l) {
	if (s == 0) {
		return [l, l, l];
	}

	var temp2 = l < 0.5 ? l * (1 + s) : l + s - l * s;
	var temp1 = 2 * l - temp2;

	h /= 360;

	var
	rtemp = (h + 1 / 3) % 1,
	gtemp = h,
	btemp = (h + 2 / 3) % 1,
	rgb = [rtemp, gtemp, btemp],
	i = 0;

	for (; i < 3; ++i) {
		rgb[i] = rgb[i] < 1 / 6 ? temp1 + (temp2 - temp1) * 6 * rgb[i] : rgb[i] < 1 / 2 ? temp2 : rgb[i] < 2 / 3 ? temp1 + (temp2 - temp1) * 6 * (2 / 3 - rgb[i]) : temp1;
	}

	return rgb;
}