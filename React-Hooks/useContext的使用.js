/**
 * @Description: useContext的使用
 * @Author:   liyingxia
 * @CreateDate:  2023/1/4 11:06
 */
import React, { useContext, useState } from 'react'
import ReactDOM from 'react-dom'

// define context
const NumberContext = React.createContext()

const NumberDisplay = () => {
    const [currentNumber, setCurrentNumber] = useContext(NumberContext)

    const handleCurrentNumberChange = () => {
        setCurrentNumber(Math.floor(Math.random() * 100))
    }

    return (
        <>
            <div>Current number is: {currentNumber}</div>
            <button onClick={handleCurrentNumberChange}>Change current number</button>
        </>
    )
}

const ParentComponent = () => {
    const [currentNumber, setCurrentNumber] = useState({})

    return (
        <NumberContext.Provider value={[currentNumber, setCurrentNumber]}>
            <NumberDisplay />
        </NumberContext.Provider>
    )
}

ReactDOM.render(<ParentComponent />, document.getElementById('root'))