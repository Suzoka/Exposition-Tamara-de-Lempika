import { useEffect, useRef } from 'react';
import * as d3 from 'd3';

import './graph_cammembert.css';

export const Graph_Camembert = ({ data }) => {
    const ref = useRef();
    console.log(data);
    useEffect(() => {
        const svg = d3.select(ref.current);
        svg.selectAll("g").remove();
        const width = 200;
        const height = 200;
        const radius = Math.min(width, height) / 2;

        // const gPie = cam.append("g").attr("transform", `translate(0,0)`);

        const color = d3.scaleOrdinal(d3.schemeCategory10);

        const pie = d3.pie().value(d => d.value);
        const arc = d3.arc().innerRadius(0).outerRadius(radius);

        const g = svg.selectAll(".arc")
            .data(pie(data))
            .enter().append("g")
            .attr("class", "arc");

        g.append("path")
            .attr("d", arc)
            // .style("fill", d => color(d.data.key))
            .attr("class", d => `cammembert__arc--${d.data.key}`);

    }, [data]);

    return (
        <svg ref={ref} width="100%" height="100%" viewBox="-100, -100, 200, 200"></svg>
    )
}