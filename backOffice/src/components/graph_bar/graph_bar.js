import { useEffect, useRef } from 'react';
import * as d3 from 'd3';

import './graph_bar.css';

export const Graph_Bar = ({ data }) => {

    // console.log(data);

    const container = useRef(null);

    useEffect(() => {
        const divs = d3.select(container.current)
            .selectAll("div")
            .data(data)
            .join("div")
            .attr("class", "graph__bar")
            .style("--width", d => `${d.value * 10}%`);
        
        divs.selectAll("p")
            .remove();
            
        divs.append("p")
            .attr("class", "graph__label")
            .text(d => d.key);
    }, [data]);

    return <div ref={container} className='graph__container'></div>;
};