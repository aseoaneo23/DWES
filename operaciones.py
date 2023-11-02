#if __name__=='__main__':

def suma(n1,n2):
    return int(n1) + int(n2)
    
def resta(n1,n2):
    return int(n1) - int(n2)
    
def multiplicacion(n1,n2):
    return int(n1) * int(n2)
    
def division(n1,n2):
    if int(n2) == 0:
        return "ERROR: División entre 0"
    else:
        return int(n1)/int(n2)
